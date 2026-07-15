const Peminjam = require('../models/peminjamModel')

const peminjamController = {
index: async (req, res) => {
const data = await Peminjam.getAll()
res.render('peminjam', { peminjam: data, total: data.length })
},
tambahHalaman: (req, res) => {
res.render('tambahPeminjam')
},
simpan: async (req, res) => {
await Peminjam.create(req.body)
res.redirect('/modules/peminjam')
},
editHalaman: async (req, res) => {
const data = await Peminjam.getById(req.params.id)
res.render('editPeminjam', { data })
},
update: async (req, res) => {
await Peminjam.update(req.params.id, req.body)
res.redirect('/modules/peminjam')
},
hapus: async (req, res) => {
await Peminjam.delete(req.params.id)
res.redirect('/modules/peminjam')
}
}

module.exports = peminjamController