function check(){
    let rn = parseInt(document.getElementById('roomno').value);
    let chkin = parseInt((document.getElementById('chkin').value).replaceAll('-',''));
    let chkout = parseInt((document.getElementById('chkout').value).replaceAll('-',''));
    let crrdate = new Date()
    let d = parseInt(String(crrdate.getFullYear())+
            (((crrdate.getMonth()+1)>9)?(crrdate.getMonth()+1):(("0"+String(crrdate.getMonth()+1))))+
            (((crrdate.getDate())>9)?(crrdate.getDate()):(("0"+String(crrdate.getDate())))))

        let flag = 0
        let str=document.getElementById("hti").innerHTML;
        let x = str.split(" ");
        let beta_flag=false;
        for(let i=0; i<x.length-1; i++){
            if(x[i]==rn){
                document.getElementById('roomnoerr').innerText="Room Taken Already\nThese room are full :\n"+str.substring(0,str.length-1).replaceAll(" ",",");
                beta_flag=true;
                break;
            }
        }
        if (rn <  1 || rn >100 || beta_flag){
            flag+=1
            if(!beta_flag) document.getElementById('roomnoerr').innerText="Enter a room no between 1 and 100"
        }else{
            document.getElementById('roomnoerr').innerText=''
            flag-=1
        }
        if (d > chkin){
            flag+=1
            document.getElementById('chkinerr').innerText="Enter a valid date"
        }else{
            document.getElementById('chkinerr').innerText=''
            flag-=1
        }
        if (chkout < chkin){
            flag+=1
            document.getElementById('chkouterr').innerText="Check in should happen before checkout"
        }else{
            document.getElementById('chkouterr').innerText=''
            flag-=1
        }   
            
    if(flag==-3){
        document.getElementById('submit').style.display="inline-block"
    }else{
        document.getElementById('submit').style.display="none"
    }


}

