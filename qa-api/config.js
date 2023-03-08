const config = {
    db: {
        /* don't expose password or any sensitive info, done only for demo */
        host: "qaapi-db",
        user: "use",
        password: "usepwd",
        database: "qaapi",
    },
    listPerPage: 10,
};
module.exports = config;