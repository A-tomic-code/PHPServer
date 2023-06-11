const ENDPOINTS = {
  create: 'http://localhost/api/getAll.php',
};

const container = document.querySelector('.data');

function fetchUsers() {
  fetch(ENDPOINTS.create)
    .then((res) => res.json())
    .then((users) => printUsers(users));
}

function printUsers(users) {
  users.map((user) => {
    container.innerHTML += `
      <div style='border: 1px solid black; padding: 16px; width:150px'>
        <p>${user.fullname}</p>
        <p>${user.address}</p>
        <p>${user.email}</p>
        <p>${user.avatar_url}</p>
      </div>
    `;
  });
}

fetchUsers();
