var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function() {
    // buat objek ajax
    var ajax = new XMLHttpRequest();

    // cek kesiapan ajax
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
        }
    }

    // eksekusi ajax
    ajax.open('GET', 'ajax/pemainBola.php?keyword=' + keyword.value, true);
    ajax.send();
})