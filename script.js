function saveDataToLocalStorage(data) {
    let pasienData = JSON.parse(localStorage.getItem('pasienData')) || [];
    let index = pasienData.findIndex(function(pasien) {
        return pasien.nomorrekam === data.nomorrekam;
    });
    if (index !== -1) {
        pasienData[index] = data;
    } else {
        pasienData.push(data);
    }
    localStorage.setItem('pasienData', JSON.stringify(pasienData));
}

function displayDataFromLocalStorage() {
    let pasienData = JSON.parse(localStorage.getItem('pasienData')) || [];

    let tableBody = document.querySelector("#pasienTable");

    pasienData.forEach(function(pasien) {
        let row = tableBody.insertRow();
        row.innerHTML = `<td>${pasien.nomorrekam}</td>
                        <td>${pasien.nama}</td>
                        <td>${pasien.alamat}</td>
                        <td>${pasien.penyakit}</td>
                        <td>${pasien.nomorruang}</td>
                        <td>${pasien.bpjs}</td>
                        <td>${pasien.tglmasuk}</td>
                        <td><button onclick="editData('${pasien.nomorrekam}')" class="btn btn-primary">Edit</button> <button onclick="deleteData('${pasien.nomorrekam}')" class="btn btn-danger">Hapus</button></td>`;
    });
}

function deleteData(nomorrekam) {
    let pasienData = JSON.parse(localStorage.getItem('pasienData')) || [];
    let filteredData = pasienData.filter(function(pasien) {
        return pasien.nomorrekam !== nomorrekam;
    });
    localStorage.setItem('pasienData', JSON.stringify(filteredData));
    location.reload();
}

function editData(nomorrekam) {
    let pasienData = JSON.parse(localStorage.getItem('pasienData')) || [];
    let pasien = pasienData.find(function(pasien) {
        return pasien.nomorrekam === nomorrekam;
    });
    if (pasien) {
        document.getElementById('nomorrekam').value = pasien.nomorrekam;
        document.getElementById('nama').value = pasien.nama;
        document.getElementById('alamat').value = pasien.alamat;
        document.getElementById('penyakit').value = pasien.penyakit;
        document.getElementById('nomorruang').value = pasien.nomorruang;
        document.getElementById('bpjs').value = pasien.bpjs;
        document.getElementById('tglmasuk').value = pasien.tglmasuk;
    }
}

document.getElementById('pasienForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = {
        nomorrekam: document.getElementById('nomorrekam').value,
        nama: document.getElementById('nama').value,
        alamat: document.getElementById('alamat').value,
        penyakit: document.getElementById('penyakit').value,
        nomorruang: document.getElementById('nomorruang').value,
        bpjs: document.getElementById('bpjs').value,
        tglmasuk: document.getElementById('tglmasuk').value,
        tglkeluar: ''
    };
    saveDataToLocalStorage(formData);
    location.reload();
});

window.addEventListener('DOMContentLoaded', function() {
    displayDataFromLocalStorage();
});