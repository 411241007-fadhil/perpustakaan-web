const Buku = require('../models/bukuModel')
const Peminjam = require('../models/peminjamModel')
const Peminjaman = require('../models/peminjamanModel')

const dashboardController = {
index: async (req, res) => {
const totalBuku = await Buku.getCount()
const totalPeminjam = await Peminjam.getCount()
const totalAktif = await Peminjaman.getActiveCount()
res.render('dashboard', { totalBuku, totalPeminjam, totalAktif })
}
}

module.exports = dashboardController