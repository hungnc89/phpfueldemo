const toastUpdateUserSuccess = document.getElementById('toast-update-user-success')

if (toastUpdateUserSuccess !== null){
    const toastCoreUI = coreui.Toast.getOrCreateInstance(toastUpdateUserSuccess)
    toastCoreUI.show()
}