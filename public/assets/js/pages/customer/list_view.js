const toastCreateUserSuccess = document.getElementById('toast-create-user-success')

if (toastCreateUserSuccess !== null){
    const toastCoreUI = coreui.Toast.getOrCreateInstance(toastCreateUserSuccess)
    toastCoreUI.show()
}

const btnCustomerEditElements = document.getElementsByClassName('btn-customer-edit');

Array.from(btnCustomerEditElements).forEach(function (item) {
    item.addEventListener('click', function () {
        window.location.href = item.getAttribute('data-url');
    });
});