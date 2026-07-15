function konfirmasiHapus(event) {
if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
event.preventDefault()
}
}

function konfirmasiKembalikan(event) {
if (!confirm('Yakin buku sudah dikembalikan?')) {
event.preventDefault()
}
}