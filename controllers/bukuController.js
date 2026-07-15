const Buku = require('../models/bukuModel')

const bukuController = {
index: async (req, res) => {
const cari = req.query.cari
const data = cari ? await Buku.search(cari) : await Buku.getAll()
res.render('buku', { buku: data, total: data.length })
},
tambahHalaman: (req, res) => {
res.render('tambahBuku')
},
simpan: async (req, res) => {
await Buku.create(req.body)
res.redirect('/modules/buku')
},
editHalaman: async (req, res) => {
const data = await Buku.getById(req.params.id)
res.render('editBuku', { data })
},
update: async (req, res) => {
await Buku.update(req.params.id, req.body)
res.redirect('/modules/buku')
},
hapus: async (req, res) => {
await Buku.delete(req.params.id)
res.redirect('/modules/buku')
}
}

module.exports = bukuController