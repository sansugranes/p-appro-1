const db = require('./services/db');
const config = require("./config");

function getOffset(currentPage = 1, listPerPage) {
    return (currentPage - 1) * [listPerPage];
}

function emptyOrRows(rows) {
    if (!rows) {
        return [];
    }
    return rows;
}

async function seedDB() {
    console.log("Running database seeder...");

    let answerContents = {
        content: '',
        author: ''
    };

    let questionContents = {
        content: '',
        author: '',
        idQuestion: 0
    };

    for (let i = 0; i < 100; i++) {
        answerContents.content = `Answer ${i}`;
        answerContents.author = `Pierre Quiroule`;

        let answer = await db.query(`
            INSERT INTO answer (ansContent, ansAuthor)
            VALUES ("${answerContents.content}", "${answerContents.author}")
        `);

        questionContents.content = `Question ${i}`;
        questionContents.author = `Pierre Quiroule`;
        questionContents.idAnswer = answer.insertId;

        let restult = await db.query(`
            INSERT INTO question (queContent, queAuthor, idAnswer)
            VALUES ("${questionContents.content}", "${questionContents.author}", ${questionContents.idAnswer})
        `);
    }
}

/**
 * Helper function to get pagination data
 * @param {number} page Current page
 * @param {boolean} answeredOnly If true, pagination data will only include questions that have answers.
 * @returns {Promise<{page: number, last: number, prev: number, next: number}>}
 */
async function getPaginationData(page, answeredOnly) {
    const totalItemsQuery = `
        SELECT COUNT(*) as total_count
        FROM question;
    `;

    const totalAnsweredItemsQuery = `
        SELECT COUNT(*) as total_count
        FROM question
        WHERE idAnswer IS NOT NULL;
    `;

    const totalItems = await db.query(answeredOnly === true ? totalAnsweredItemsQuery : totalItemsQuery);

    const last = Math.ceil(totalItems[0].total_count / config.listPerPage);
    const prev = page <= 1 ? null : page - 1;
    const next = page >= last ? null : page + 1;

    return {page, last, prev, next};
}

module.exports = {
    getOffset,
    emptyOrRows,
    seedDB,
    getPaginationData
}