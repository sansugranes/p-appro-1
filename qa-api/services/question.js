const db = require('./db');
const helper = require('../helper');
const config = require('../config');

/**
 *
 * @param {number} page
 * @returns {Promise<{data: ([]|*), meta: {page: number, last: number, prev: number, next: number}}>}
 */
async function getMultipleAnswered(page = 1) {
    const offset = helper.getOffset(page, config.listPerPage);
    const rows = await db.query(`
        SELECT *
        FROM question
                 LEFT JOIN answer
                           ON answer.idAnswer = question.idAnswer
        WHERE question.idAnswer IS NOT NULL
        ORDER BY queCreated_at DESC , ansCreated_at DESC
            LIMIT ${offset}
            , ${config.listPerPage}
    `);

    const data = helper.emptyOrRows(rows);
    const meta = await helper.getPaginationData(page, true);

    return {
        data, meta
    }
}

/**
 * Gets multiple questions (and corresponding answers) paginated.
 * @param {number} page
 * @returns {Promise<{data: ([]|*), meta: Promise<{page: number, last: number, prev: number, next: number}>}>}
 */
async function getMultiple(page = 1) {
    const offset = helper.getOffset(page, config.listPerPage);
    const rows = await db.query(`
        SELECT *
        FROM question
                 LEFT JOIN answer
                           ON answer.idAnswer = question.idAnswer
        ORDER BY queCreated_at DESC , ansCreated_at DESC
            LIMIT ${offset} , ${config.listPerPage}
    `);

    const data = helper.emptyOrRows(rows);
    // get pagination data
    const meta = await helper.getPaginationData(page, false);

    return {
        data, meta
    }
}

/**
 * Gets a question based on its ID
 * @param {!number} id Question ID to get
 * @returns {Promise<{message: string}>} Created question
 */
async function getOne(id) {
    const rows = await db.query(`
        SELECT *
        FROM question
                 LEFT JOIN answer
                           ON answer.idAnswer = question.idAnswer
        WHERE question.idQuestion = ${id}
    `)
    const data = helper.emptyOrRows(rows);

    return data;
}

/**
 * Creates a question
 * @param {!Object} question Question object containing content and author
 * @param {!string} question.content Question content (message)
 * @param {!string} question.author Question author
 * @returns {Promise<string>} Success message
 */
async function create(question) {
    const result = await db.query(`INSERT INTO question
                                       (queContent, queAuthor)
                                   VALUES ("${question.content}", "${question.author}")`);
    let message = 'Error in creating question';

    if (result.affectedRows) {
        message = 'Question created successfully';
    }

    return message;
}

/**
 * Adds an answer to a question based on its ID
 * @param {!Object} answerContent Answer object containing content and author
 * @param {!string} answerContent.content Answer content (message)
 * @param {!string} answerContent.author Answer author
 * @param {!number} id Question ID to add the answer to
 * @returns {Promise<{message: string}>} Success message
 */
async function answer(answerContent, id) {
    const answer = await db.query(`
        INSERT INTO answer (ansContent, ansAuthor)
        VALUES ("${answerContent.content}", "${answerContent.author}")
    `);

    const result = await db.query(`
        UPDATE question
        SET idAnswer = ${answer.insertId}
        WHERE idQuestion = ${id}
    `)

    let message = 'Error in answering question';
    if (result.affectedRows) {
        message = 'Question answered successfully';
    }

    return {message};
}

/**
 * Deletes a question based on its ID
 * @param {!number} id Question ID to delete
 * @returns {Promise<{message: string}>} Success message
 */
async function remove(id) {
    const result = await db.query(`
        DELETE
        FROM question
        WHERE idQuestion = ${id}
    `)
    let message = 'Error in deleting question';

    if (result.affectedRows) {
        message = 'Question deleted successfully';
    }

    return {message};
}

module.exports = {
    getMultipleAnswered, getMultiple, getOne, create, answer, remove
}