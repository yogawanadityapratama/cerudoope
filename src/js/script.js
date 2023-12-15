// Fungsi untuk mendapatkan data dari localStorage
function getDataFromLocalStorage() {
    const storedData = localStorage.getItem('crudData');
    return storedData ? JSON.parse(storedData) : [];
}

// Fungsi untuk menyimpan data ke localStorage
function saveDataToLocalStorage() {
    localStorage.setItem('crudData', JSON.stringify(data));
}

// Sample data array
let data = getDataFromLocalStorage();

// Function to create a new entry
function create() {
    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;

    const entry = {
        id: new Date().getTime(),
        name: name,
        price: price
    };

    data.push(entry);
    saveDataToLocalStorage(); // Simpan data ke localStorage
    displayData();
    clearForm();
}

// Function to display data
function displayData() {
    const dataList = document.getElementById('data-list');
    dataList.innerHTML = '';

    data.forEach(entry => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `<div><h1>${entry.name}</h1>Price: ${entry.price} <br><br> <button style="background-color: blue; color: white;" onclick="update(${entry.id})">Update</button> <button style="background-color: red; color: white;" onclick="remove(${entry.id})">Delete</button></div>`;
        dataList.appendChild(listItem);
    });
}

// Function to update an entry
function update(id) {
    const entry = data.find(item => item.id === id);
    if (entry) {
        const newName = prompt('Enter new name:', entry.name);
        const newPrice = prompt('Enter new price:', entry.price);

        entry.name = newName;
        entry.price = newPrice;

        saveDataToLocalStorage(); // Simpan data ke localStorage
        displayData();
    }
}

// Function to remove an entry
function remove(id) {
    data = data.filter(item => item.id !== id);
    saveDataToLocalStorage(); // Simpan data ke localStorage
    displayData();
}

// Function to clear the form
function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('price').value = '';
}

// Panggil displayData saat halaman dimuat
displayData();
