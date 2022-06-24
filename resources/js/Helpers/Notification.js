import Noty from 'noty';
class Notification{

    success(){
        new Noty({
            text: 'Successfully Done',
            layout: 'topRight',
            timeout: 1000,
        }).show();
    }

    alert(){
        new Noty({
            text: 'Are You Sure',
            layout: 'topRight',
            timeout: 1000,
        }).show();
    }

    error(){
        new Noty({
            text: 'Something Went Wrong',
            layout: 'topRight',
            timeout: 1000,
        }).show();
    }

    warning(){
        new Noty({
            text: 'Opps Wrong',
            layout: 'topRight',
            timeout: 1000,
        }).show();
    }

    image_validation(){
        new Noty({
            text: 'Upload Image less then 1MB',
            layout: 'topRight',
            timeout: 1000,
        }).show();
    }

}

export default Notification = new Notification()
