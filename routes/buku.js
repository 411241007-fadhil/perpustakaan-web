const express = require('express')
const router = express.Router()
const bukuController = require('../controllers/bukuController')

router.get('/', bukuController.index)
router.get('/tambah', bukuController.tambahHalaman)
router.post('/tambah', bukuController.simpan)
router.get('/edit/:id', bukuController.editHalaman)
router.post('/edit/:id', bukuController.update)
router.get('/hapus/:id', bukuController.hapus)

module.exports = router