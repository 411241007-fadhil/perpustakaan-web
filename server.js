const express = require('express')
const path = require('path')
const app = express()

app.set('view engine', 'ejs')
app.set('views', path.join(__dirname, 'views'))

app.use(express.urlencoded({ extended: true }))
app.use(express.static(path.join(__dirname, 'public')))

const dashboardRouter = require('./routes/dashboard')
const bukuRouter = require('./routes/buku')
const peminjamRouter = require('./routes/peminjam')
const peminjamanRouter = require('./routes/peminjaman')

app.use('/', dashboardRouter)
app.use('/modules/buku', bukuRouter)
app.use('/modules/peminjam', peminjamRouter)
app.use('/modules/peminjaman', peminjamanRouter)

app.listen(3000, () => {
console.log('Server berjalan pada http://localhost:3000')
})