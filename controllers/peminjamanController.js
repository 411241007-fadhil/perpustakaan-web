const Peminjaman = require('../models/peminjamanModel')
const Buku = require('../models/bukuModel')
const Peminjam = require('../models/peminjamModel')

const daftarBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

const formatTanggalIndo = (dateStr) => {
  if (!dateStr) return 'Belum Kembali'
  const d = new Date(dateStr)
  if (isNaN(d.getTime())) return dateStr
  return d.getDate() + ' ' + daftarBulan[d.getMonth()] + ' ' + d.getFullYear()
}

const peminjamanController = {
  index: async (req, res) => {
    const dataRaw = await Peminjaman.getAll()
    const dataFormatted = dataRaw.map(item => ({
      id_pinjam: item.id_pinjam,
      judul: item.judul,
      peminjam: item.peminjam,
      tanggal_pinjam: formatTanggalIndo(item.tanggal_pinjam),
      tanggal_kembali: formatTanggalIndo(item.tanggal_kembali),
      status: item.status
    }))
    res.render('peminjaman', { peminjaman: dataFormatted, total: dataFormatted.length })
  },
  
  tambahHalaman: async (req, res) => {
    const dataBuku = await Buku.getAll()
    const dataPeminjam = await Peminjam.getAll()
    res.render('tambahPeminjaman', { buku: dataBuku, peminjam: dataPeminjam })
  },
  
  simpan: async (req, res) => {
    await Peminjaman.create(req.body)
    res.redirect('/modules/peminjaman')
  },
  
  editHalaman: async (req, res) => {
    const data = await Peminjaman.getById(req.params.id)
    const dataBuku = await Buku.getAll()
    const dataPeminjam = await Peminjam.getAll()
    
    if (data.tanggal_pinjam) {
      data.tanggal_pinjam = new Date(data.tanggal_pinjam).toISOString().split('T')[0]
    }
    if (data.tanggal_kembali) {
      data.tanggal_kembali = new Date(data.tanggal_kembali).toISOString().split('T')[0]
    }
    
    res.render('editPeminjaman', { data, buku: dataBuku, peminjam: dataPeminjam })
  },
  
  update: async (req, res) => {
    await Peminjaman.update(req.params.id, req.body)
    res.redirect('/modules/peminjaman')
  },
  
  kembali: async (req, res) => {
    await Peminjaman.updateStatus(req.params.id)
    res.redirect('/modules/peminjaman')
  },
  
  hapus: async (req, res) => {
    await Peminjaman.delete(req.params.id)
    res.redirect('/modules/peminjaman')
  }
}

module.exports = peminjamanController