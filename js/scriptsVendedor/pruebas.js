const guardar = document.getElementById('guardar');
guardar.addEventListener('click', async function(e){
    e.preventDefault();

    const formData= new FormData(form);
    
    console.log([...formData]);

    try {
        const res = await axios.post('https://httpbin.org/post', formData)
        console.log(res);
    } catch (e) {
        console.log(error);
    }
})

// document.getElementById('form')
//     .addEventListener('submit', e =>{
//         e.preventDefault()
//         const data = Object.fromEntries(
//             new FormData(e.target)
//         )
//         alert(JSON.stringify(data))
//     })