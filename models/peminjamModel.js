const db = require('../config/database')

const Peminjam = {
getAll: async () => {
const [rows] = await db.query('SELECT * FROM peminjam')
return rows
},
getById: async (id) => {
const [rows] = await db.query('SELECT * FROM peminjam WHERE id_peminjam = ?', [id])
return rows[0]
},
create: async (data) => {
await db.query('INSERT INTO peminjam (nama, nim, jurusan, no_hp) VALUES (?, ?, ?, ?)', [data.nama, data.nim, data.jurusan, data.no_hp])
},
update: async (id, data) => {
await db.query('UPDATE peminjam SET nama = ?, nim = ?, jurusan = ?, no_hp = ? WHERE id_peminjam = ?', [data.nama, data.nim, data.jurusan, data.no_hp, id])
},
delete: async (id) => {
await db.query('DELETE FROM peminjam WHERE id_peminjam = ?', [id])
},
getCount: async () => {
const [rows] = await db.query('SELECT COUNT(*) AS total FROM peminjam')
return rows[0].total
}
}

module.exports = Peminjam