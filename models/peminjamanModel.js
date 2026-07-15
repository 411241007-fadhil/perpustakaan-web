const db = require('../config/database')

const Peminjaman = {
  getAll: async () => {
    const [rows] = await db.query(`
      SELECT p.id_pinjam, b.judul, m.nama AS peminjam, 
             p.tanggal_pinjam, p.tanggal_kembali, p.status 
      FROM peminjaman p
      JOIN buku b ON p.id_buku = b.id_buku
      JOIN peminjam m ON p.id_peminjam = m.id_peminjam
    `)
    return rows
  },
  
  getById: async (id) => {
    const [rows] = await db.query('SELECT * FROM peminjaman WHERE id_pinjam = ?', [id])
    return rows[0]
  },
  
  create: async (data) => {
    await db.query('INSERT INTO peminjaman (id_buku, id_peminjam, tanggal_pinjam, tanggal_kembali, status) VALUES (?, ?, ?, ?, "Dipinjam")', [data.id_buku, data.id_peminjam, data.tanggal_pinjam, data.tanggal_kembali])
    await db.query('UPDATE buku SET stok = stok - 1 WHERE id_buku = ?', [data.id_buku])
  },
  
  update: async (id, data) => {
    await db.query('UPDATE peminjaman SET id_buku = ?, id_peminjam = ?, tanggal_pinjam = ?, tanggal_kembali = ?, status = ? WHERE id_pinjam = ?', [data.id_buku, data.id_peminjam, data.tanggal_pinjam, data.tanggal_kembali, data.status, id])
  },
  
  updateStatus: async (id) => {
    const [rows] = await db.query('SELECT id_buku FROM peminjaman WHERE id_pinjam = ?', [id])
    if (rows.length > 0) {
      await db.query('UPDATE buku SET stok = stok + 1 WHERE id_buku = ?', [rows[0].id_buku])
    }
    await db.query('UPDATE peminjaman SET status = "Dikembalikan", tanggal_kembali = CURDATE() WHERE id_pinjam = ?', [id])
  },
  
  delete: async (id) => {
    await db.query('DELETE FROM peminjaman WHERE id_pinjam = ?', [id])
  },
  
  getActiveCount: async () => {
    const [rows] = await db.query('SELECT COUNT(*) AS total FROM peminjaman WHERE status = "Dipinjam"')
    return rows[0].total
  }
}

module.exports = Peminjaman