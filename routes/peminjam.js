const express = require('express')
const router = express.Router()
const peminjamController = require('../controllers/peminjamController')

router.get('/', peminjamController.index)
router.get('/tambah', peminjamController.tambahHalaman)
router.post('/tambah', peminjamController.simpan)
router.get('/edit/:id', peminjamController.editHalaman)
router.post('/edit/:id', peminjamController.update)
router.get('/hapus/:id', peminjamController.hapus)

module.exports = router