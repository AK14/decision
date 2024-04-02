import './bootstrap';
import * as fn from "./functions.js";

window.onload = () =>{
    let addLinkForm = document.querySelector('form[name="newLinkForm"]');
    if(addLinkForm){
        // listener for submit
        addLinkForm.addEventListener('submit' ,(e)=>{
            let linkModal = bootstrap.Modal.getInstance( document.querySelector('#linkModal') );
            e.preventDefault();
            let formData = new FormData(addLinkForm);
            let fomMethod = addLinkForm.method
            axios({
              method:fomMethod,
              url:  '/link',
              data:formData
            })
            .then(function (response){
                linkModal.hide();
                fn.showToast('bg-success', 'Link successfully created');
                window.location.reload();
            }).catch( function (error){
                if(error.response.status === 422 && error.response.data?.errors){
                    /* show errors action*/
                    Object.entries(error.response.data.errors).forEach(er=>{
                        let input = addLinkForm.querySelector(`input[name="${er[0]}"]`);
                        let errorField = input.closest('.input-block').querySelector('.invalid-feedback');
                        input.classList.add('is-invalid');
                        errorField.innerHTML = er[1];
                    })
                }
                if(error.response.status === 422 && error.response.data?.message){
                    linkModal.hide();
                    fn.showToast('bg-danger', error.response.data.message);
                }
            })
        })
        // if user enter, we hide the error message
        let linkFormInputs = addLinkForm.querySelectorAll('input');
        if( linkFormInputs ){
            linkFormInputs.forEach((inp)=>{
                inp.addEventListener('keydown',()=>{
                    let errorField = inp.closest('.input-block').querySelector('.invalid-feedback');
                    inp.classList.remove('is-invalid');
                    errorField.innerHTML = '';
                })
            })
        }
    }


    let linkCards = document.querySelectorAll('.link-card');
    if(linkCards){
        linkCards.forEach(card => {
            let linkId = card.getAttribute('data-link');
            let shorLinksCopy = card.querySelector('.copy-link');
            if (shorLinksCopy){
                shorLinksCopy.addEventListener('click',(e)=>{
                    e.preventDefault();
                    let href = cp.href;
                    fn.copyToClipboard(href);
                })
            }

            // delete
            let deleteBtn = card.querySelector('.btn-outline-danger');
            deleteBtn.addEventListener('click', (e)=>{
                e.preventDefault();
                let formData = new FormData();
                formData.append('id', linkId)
                axios({
                    method:"delete",
                    url:  '/link/'+linkId,
                })
                    .then(function (response){
                        fn.showToast('bg-success', response.data.message);
                        let timeOut = setTimeout(()=>{
                            window.location.reload();
                        }, 600);

                    }).catch( function (error){
                    if(error.response.status === 422 && error.response.data?.message){
                        fn.showToast('bg-danger', error.response.data.message);
                    }
                })
            })

            // edit
            let editBtn = card.querySelector('.btn-outline-info');
            editBtn.addEventListener('click', (e)=>{
                e.preventDefault();
                /* get values from card */
                let data = {
                    id :  card.getAttribute('data-link'),
                    name: card.querySelector('.card-title').textContent,
                    link: card.querySelector('.full-link').textContent,
                    short_link: card.querySelector('.short-link').getAttribute('data-value')
                }
                /* add values to form fields and open modal */
                if( addLinkForm ){

                }
                let linkModal = bootstrap.Modal.getInstance( document.querySelector('#linkModal') );


            })
        })
    }
}

