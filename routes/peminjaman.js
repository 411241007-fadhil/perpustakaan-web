const express = require('express')
const router = express.Router()
const peminjamanController = require('../controllers/peminjamanController')

router.get('/', peminjamanController.index)
router.get('/tambah', peminjamanController.tambahHalaman)
router.post('/tambah', peminjamanController.simpan)
router.get('/edit/:id', peminjamanController.editHalaman)
router.post('/edit/:id', peminjamanController.update)
router.get('/kembali/:id', peminjamanController.kembali)
router.get('/hapus/:id', peminjamanController.hapus)

module.exports = router