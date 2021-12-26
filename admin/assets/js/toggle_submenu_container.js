let moreBtns=document.querySelectorAll("tbody .orders__more-btn");
            document.addEventListener('click',function(e){
                console.log(e.target)
                for (let moreBtn of moreBtns){
                    let menu=moreBtn.querySelector(".orders__table-sub-menu");
                    let displayStyle = window.getComputedStyle(menu).getPropertyValue("display");
                    if (!moreBtn.contains(e.target)) {
                        if(displayStyle==='block') {
                            menu.classList.toggle("hidden");
                            moreBtn.parentElement.classList.toggle("float-z");
                        }
                    }
                    else{
                        menu.classList.toggle("hidden");
                        moreBtn.parentElement.classList.toggle("float-z");
                    }
                }
            })