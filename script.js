const formemp = document.getElementById("formemp");
const inputname = document.getElementById("name");
const inputemail = document.getElementById("email");
const inputmobile = document.getElementById("mobile");
const tablebody = document.querySelector("#example tbody");

const submit = document.getElementById("submit");
const contIdEdit = document.getElementById("contIdEdit");

class Employee{
    constructor(id,name,email,mobile)
    {
        this.id=id;
        this.name=name;
        this.email=email;
        this.mobile=mobile;
    }

    showdata()
    {
        Employee.showhtml(this.id,this.name,this.email,this.mobile)
        return this;
    }
    storeEmp()
    {
        const alldata= JSON.parse(localStorage.getItem("employees")) ?? [] ;
        alldata.push({id:this.id,name:this.name,email:this.email,mobile:this.mobile});
        localStorage.setItem("employees",JSON.stringify(alldata));
    }

    updateEmp(id)
    {
        const newItem = {id:id,name:this.name,email:this.email,mobile:this.mobile}
        const updatedata= JSON.parse(localStorage.getItem("employees")).map((i)=>
        {
            if(i.id==id)
            {
                return newItem;
            }
            return i;
        })
        localStorage.setItem("employees",JSON.stringify(updatedata))
    }
    static showhtml(id,name,email,mobile)
    {
        const tr1 = document.createElement("tr");
        tr1.innerHTML = `<tr role="row" class="odd">
                        <td>${name}</td>
                        <td>${email}</td>
                        <td>${mobile}</td>
                        <td>
                            <button class="button button2 edit" data-id="${id}">Edit</button>
                            <button class="button button3 delete" data-id="${id}">Delete</button>
                        </td>
                        </tr>`
        tablebody.appendChild(tr1);          
    }
    static showAlldata()
    {
        if(localStorage.getItem("employees"))
        {
            JSON.parse(localStorage.getItem("employees")).forEach((i)=>{
                Employee.showhtml(i.id,i.name,i.email,i.mobile)
            })
        }
    }

}

tablebody.addEventListener("click",(e)=>{
    if(e.target.classList.contains("delete"))
    {
        const id= e.target.getAttribute("data-id")
        const emp= JSON.parse(localStorage.getItem("employees"))
        const newdata= emp.filter(i => i.id != id)
        localStorage.setItem("employees",JSON.stringify(newdata))


        e.target.parentElement.parentElement.remove();
    }
    if(e.target.classList.contains("edit"))
    {
        const id= +e.target.getAttribute("data-id")
        const i= JSON.parse(localStorage.getItem("employees")).find(i => i.id ===id)
        inputname.value=i.name;
        inputemail.value=i.email;
        inputmobile.value=i.mobile;
        contIdEdit.value= id;
        submit.value="Edit this item";

        e.target.parentElement.parentElement.remove();
    }
})
Employee.showAlldata();

    
formemp.addEventListener("submit",(e)=>{
    e.preventDefault();
    if(!contIdEdit.value)
    {
        let id = Math.floor(Math.random() * 100000);
        const newe = new Employee(id,inputname.value,inputemail.value,inputmobile.value);
        newe.showdata().storeEmp();
        inputname.value='';
        inputemail.value='';
        inputmobile.value='';
    }
    else
    {
        const id = contIdEdit.value;
        const newemp = new Employee(id,inputname.value,inputemail.value,inputmobile.value);
        newemp.updateEmp(id);
        submit.value="Store This Data";
        tablebody.innerHTML='';
        Employee.showAlldata();

    }
    inputname.value='';
    inputemail.value='';
    inputmobile.value='';
});
