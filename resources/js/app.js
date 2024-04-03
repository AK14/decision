import './bootstrap';
import * as fn from "./functions.js";

window.onload = () =>{
    let addLinkForm = document.querySelector('form[name="newLinkForm"]');
    if(addLinkForm){
        // listener for submit
        addLinkForm.addEventListener('submit' ,(e)=>{
            let action = addLinkForm.getAttribute('action');
            let linkModal = bootstrap.Modal.getOrCreateInstance( document.querySelector('#linkModal') );
            e.preventDefault();
            let fromData = new FormData(addLinkForm);
            fromData.append('_method',addLinkForm.getAttribute('method'))
            axios({
              method:'POST',
              url:  action,
              data:fromData
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
                if(error.response.status === 422 && error.response.data?.ext-message){
                    linkModal.hide();
                    fn.showToast('bg-danger', error.response.data.ext-message);
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

        /* listener if tap create Link button change form action  */
        let openCretaeLinkModalBtn =  document.querySelector('.create-link-btn');
        if(openCretaeLinkModalBtn){
            openCretaeLinkModalBtn.addEventListener('click',(e) =>{
                addLinkForm.setAttribute('action', '/link')
                addLinkForm.setAttribute('method', 'post')
                addLinkForm.querySelectorAll('input').forEach(input =>{
                    input.value = '';
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
                    name: card.querySelector('.card-title').textContent,
                    link: card.querySelector('.full-link').textContent,
                    short_link: card.querySelector('.short-link').getAttribute('data-value')
                }
                /* add values to form fields and open modal */
                if( addLinkForm ){
                    Object.keys(data).map((key)=>{
                        let formInput = addLinkForm.querySelector(`input[name="${key}"]`);
                        formInput.value = String(data[key])
                    })
                    addLinkForm.setAttribute('action','/link/'+linkId);
                    addLinkForm.setAttribute('method','put');
                }
                let linkModal = bootstrap.Modal.getOrCreateInstance( document.getElementById('linkModal') );

                linkModal.show();
            })
        })
    }
}

