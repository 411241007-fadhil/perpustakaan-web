const db = require('../config/database')

const Buku = {
  getAll: async () => {
    const [rows] = await db.query('SELECT * FROM buku')
    return rows
  },
  getById: async (id) => {
    const [rows] = await db.query('SELECT * FROM buku WHERE id_buku = ?', [id])
    return rows[0]
  },
  create: async (data) => {
    await db.query('INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, stok) VALUES (?, ?, ?, ?, ?)', [data.judul, data.penulis, data.penerbit, data.tahun, data.stok])
  },
  update: async (id, data) => {
    await db.query('UPDATE buku SET judul = ?, penulis = ?, penerbit = ?, tahun_terbit = ?, stok = ? WHERE id_buku = ?', [data.judul, data.penulis, data.penerbit, data.tahun, data.stok, id])
  },
  delete: async (id) => {
    await db.query('DELETE FROM buku WHERE id_buku = ?', [id])
  },
  search: async (q) => {
    const [rows] = await db.query('SELECT * FROM buku WHERE judul LIKE ? OR penulis LIKE ?', [`%${q}%`, `%${q}%`])
    return rows
  },
  getCount: async () => {
    const [rows] = await db.query('SELECT COUNT(*) AS total FROM buku')
    return rows[0].total
  }
}

module.exports = Buku