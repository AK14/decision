export const showToast = (type, message) => {

    let toastBlock = document.querySelector('.toast');
    let toast = new bootstrap.Toast( toastBlock);
    if(toast)
    {
        toastBlock.querySelector('.toast-body').innerHTML = message;
        toastBlock.className = 'toast text-light '+type;
        toast.show();
    }
}

export const copyToClipboard = (data) => {
    if(navigator.clipboard){
        navigator.clipboard.writeText(data).then(r =>
            showToast('bg-success', 'Copied')
        )
    }else {
        showToast('bg-warning', 'Your browser does not allow copying');
    }



}