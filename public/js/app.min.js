function getdata(method,data,succses = function(ans) {}) {

    let getdata = new XMLHttpRequest();

    getdata.open('POST','/' + method,true)
    getdata.setRequestHeader('Content-Type','application/json; charset=utf-8')
    getdata.send( JSON.stringify(data) )
    getdata.onreadystatechange = function() {
        if (getdata.readyState != 4) return;        
        ans = JSON.parse(getdata.responseText)
        console.log(ans)
        succses(ans);
    }
};

document.querySelectorAll('div[data-href]').forEach(el=>{
    if (el.dataset.href == 'ready') {
        el.addEventListener('click',()=>{
            el.classList.add('hidden')
            el.parentElement.querySelector('.btn-dark').classList.add('hidden')
            el.parentElement.querySelector('.btn-primary').classList.add('hidden')
            getdata('ready/' + el.dataset.id,{},(ans)=>{
                if (ans.status === true) {
                    el.innerHTML = 'Выполнено ' + el.innerHTML
                    el.classList.remove('hidden')
                }
            })
        })
    }
})