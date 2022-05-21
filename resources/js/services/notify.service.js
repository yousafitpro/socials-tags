import { toast } from 'react-toastify';
var options={
    position: "top-right",
autoClose: 5000,
hideProgressBar: false,
closeOnClick: true,
pauseOnHover: true,
draggable: true,
progress: undefined,
}
export const successToaster=(message)=>{
    toast.success(message,options);
}
export const warnToaster=(message)=>{
    toast.warn(message,options);
}
export const errorToaster=(message)=>{
    toast.error(message,options);
}
export const infoToaster=(message)=>{
    toast.info(message,options);
}