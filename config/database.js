const mysql = require('mysql2')

const pool = mysql.createPool({
host: 'localhost',
user: 'root',
password: '',
database: 'perpustakaan',
port: 3300
})

module.exports = pool.promise()