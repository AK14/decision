export const showToast = (type, message) => {

    let toastBlock = document.querySelector('.toast');
    let toast = new bootstrap.Toast( toastBlock);
    if(toast)
    {
        toastBlock.querySelector('.toast-body').innerHTML = message;
        toast.show();
    }
}
