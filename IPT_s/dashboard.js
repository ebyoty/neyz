var complete = document.querySelectorAll('#complete')

complete.forEach(element => {
    element.addEventListener('click', (e) => {
        e.preventDefault()

        var deleteComplete = element.closest('tr')
        var id = element.closest('tr #complete').value
        
       
        $(document).ready(function(){
            $.ajax({
                url: 'deleteOrder.php',
                method: 'POST',
                data: {id: id},
                success: function(data){
                    deleteComplete.remove()
                    alert('Completed Order!')

                }
            })

        })

    })
});
