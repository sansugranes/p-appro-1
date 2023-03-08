const mysql = require('mysql2/promise');
const config = require('../config');

let _db;
async function getDBConnection() {
    if(!_db) {
        console.log("Creating db connection...");
        _db = await mysql.createConnection(config.db);
    }
    return _db;
}
async function query(sql, params) {
    const connection = await getDBConnection();
    const [results, ] = await connection.execute(sql, params);

    return results;
}

module.exports = {
    query
}