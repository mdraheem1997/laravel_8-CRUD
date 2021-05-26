<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// use Session;
use Image;
class AdminController extends Controller
{
    //
    public function insert_admin(Request $req)
    {
       // require base_path('vendor/autoload.php');

//Instantiation and passing `true` enables exceptions
        //$mail = new PHPMailer(true);
            $req->validate(
                [
                    'username'=>'required',
                    'name'=>'required',
                    'pwd'=>'required',
                    'email'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg,gif',
                ]
            );
            $input = new admin;
        
            $input->username = $req->username;
            $input->name = $req->name;
            $input->password = $req->pwd;
            $input->email = $req->email;
            //$input->password = sha1($req->pwd);
            //$input->password = md5($req->pwd);


            // image insert start
            $input->image = $req->file('image')->getClientOriginalName();
 
            $path = $req->file('image')->store('uploads');
            // image insert end.
            $input->save();
            //Server settings
   /* $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'raheem.ullah@neosoftmail.com';                     //SMTP username
    //$mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('mdraheem1997@gmail.com', 'Raheem');
    $mail->addAddress($req->email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('raheem.ullah@neosoftmail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email send testing';
    $mail->Body    = 'Testing through PHP mailer <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    echo 'Message has been sent';
}else{
    echo 'mail sending fail';
} */
            $req->session()->flash('msg',"Data Inserted Successfully");
             //return redirect('add-admin');
             return redirect('manage-admin');
    }
    public function manage_admin()
    {
        //$data['admin'] = admin::all(); for fetch all data
        //  $data['admin'] = admin::paginate(3);

        // $data['admin'] = admin::where('status',1)->paginate(3);
        $data['admin'] = admin::where('status',1)->orderby('id','DESC')->get();
        //print_r($data->toSql());
        
        // $data['admin'] = admin::with('users')->get()->toArray();
        // echo  "<pre>";
        // print_r($data);die;  //for show  data through join
        return view('manage-admin',$data);
    }
    public function edit_admin($id)
    {
        $id = base64_decode($id);
        $data['member'] = admin::find($id);
        return view('edit-admin',$data);
    }
    public function update_admin(Request $req)
    {
        $req->validate(
            [
                'username'=>'required',
                'name'=>'required',
                'pwd'=>'required',
                'image'=>'image|mimes:jpg,png,jpeg,gif',
            ]
        );

        $id = $req->hidden_id;
        $data = admin::find($id);
        $data ->username = $req->username;
        $data ->name = $req->name;
        $data ->password = $req->pwd;
        if($req->image!=''){
            // image insert start
            $data->image = $req->file('image')->getClientOriginalName();
 
            $path = $req->file('image')->store('uploads');
            // image insert end.
        }
        $data->save();
        $req->session()->flash('msg',"Data Updated Successfully");
        return redirect('manage-admin');
    }
    public function delete_admin(Request $req,$id)
    {
        
       $id = base64_decode($id);
         DB::table('admins')
                    ->where('id',$id)
                    ->update(['status'=>'0']);
        $req->session()->flash('msg',"Data Deleted");         
        return redirect('manage-admin');
// this method is use from model...
        // return admin::where('id',$id)
        //             ->update(['status'=>'0']);
    }
}
