document.getElementById('new-evaluation-form').addEventListener('submit', (e) => {
    e.preventDefault()
    if (document.getElementById('pesoSollevato').value > 30) {
        alert('Il valore deve essere minore di 30')
    }
})