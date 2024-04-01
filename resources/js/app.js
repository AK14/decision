import './bootstrap';
import * as fn from "./functions.js";

window.onload = () =>{
    let addLinkForm = document.querySelector('form[name="newLinkForm"]');
    let linkModal = document.querySelector('#linkModal');
    if(addLinkForm){
        addLinkForm.addEventListener('submit' ,(e)=>{
            e.preventDefault();
            let formData = new FormData(addLinkForm);
            axios.post('/link', formData)
            .then(function (response){
                let modal = bootstrap.Modal.getInstance( linkModal );
                modal.hide();
                fn.showToast('bg-success', 'Link successfully created');
                window.location.reload();
            }).catch( function (error){
                console.log(error)
                if(error.response.status === 422 && error.response.data?.errors){
                    /* show errors action*/
                    Object.entries(error.response.data.errors).forEach(er=>{
                        let input = addLinkForm.querySelector(`input[name="${er[0]}"]`);
                        let errorField = input.closest('.input-block').querySelector('.invalid-feedback');
                        input.classList.add('is-invalid');

                        errorField.innerHTML = er[1];
                    })
                }
            })
        })
    }
}

