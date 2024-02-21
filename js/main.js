
let addCommentButton = document.querySelectorAll('.add_comment');
let commentDiv = document.querySelectorAll('.comments');
let commentForm = document.querySelectorAll('.add_comment_form');
let cancelSubmitButton =document.querySelectorAll('.cancel_submit');



for (let i=0; i < addCommentButton.length; i++){

    addCommentButton[i].addEventListener('click', () =>{
        commentDiv[i].classList.remove('block');
        commentDiv[i].classList.add('hidden');
        
        commentForm[i].classList.remove ('hidden');
        commentForm[i].classList.add('block')
    })
    
    cancelSubmitButton[i].addEventListener('click', () =>{
        console.log(commentDiv[i]);
        commentDiv[i].classList.remove('hidden');
        commentDiv[i].classList.add('block');
    
        commentForm[i].classList.remove ('block');
        commentForm[i].classList.add('hidden')
    })
}




