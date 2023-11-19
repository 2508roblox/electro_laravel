<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfomationController extends Controller
{
    public function index()
    {
        return view('admin.infomation.index');
    }

    public function assignment()
    {
        $technologies = [
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png',
                'name' => 'Laravel framework',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Node.js_logo.svg/2560px-Node.js_logo.svg.png',
                'name' => 'Nodejs',
                'version' => '18.12.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png',
                'name' => 'PHP',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://sp-ao.shortpixel.ai/client/q_glossy,ret_img,w_256/https://itsolution24x7.com/blog/wp-content/uploads/2020/06/socketio.png',
                'name' => 'Socket.io',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://w7.pngwing.com/pngs/545/451/png-transparent-node-js-express-js-javascript-solution-stack-web-application-others-angle-text-rectangle-thumbnail.png',
                'name' => 'Expressjs ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://images.crunchbase.com/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco,dpr_1/ootanirnpyzh3gbkwp0f',
                'name' => 'Cors',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582748_960_720.png',
                'name' => 'Html',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582747_1280.png',
                'name' => 'Css',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://logos-world.net/wp-content/uploads/2023/02/JavaScript-Logo.png',
                'name' => 'Javascript',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1150px-React-icon.svg.png',
                'name' => 'Reactjs',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Vitejs-logo.svg/1039px-Vitejs-logo.svg.png',
                'name' => 'Vite',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Tailwind_CSS_Logo.svg/2560px-Tailwind_CSS_Logo.svg.png',
                'name' => 'Tailwindcss ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://mui.com/static/logo.png',
                'name' => 'Material Ui',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/49/Redux.png',
                'name' => 'Redux',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://user-images.githubusercontent.com/2182637/53611918-54c1ff80-3c24-11e9-9917-66ac3cef513d.png',
                'name' => 'react-beautiful-dnd',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Npm-logo.svg/540px-Npm-logo.svg.png',
                'name' => 'npm',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVmrhsXTKKEDTeCJqIWMYNc32F_r-zIWW8v9Fnv4pc&s',
                'name' => 'react-router',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://cdn.worldvectorlogo.com/logos/postman.svg',
                'name' => 'Postman ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://laravel-livewire.com/img/twitter.png',
                'name' => 'Livewire',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://seeklogo.com/images/D/dialogflow-logo-534FF34238-seeklogo.com.png',
                'name' => 'Dialogflow ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://freebiehive.com/wp-content/uploads/2023/04/Chat-GPT-Icon-PNG.jpg',
                'name' => 'Chat GPT',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://w7.pngwing.com/pngs/720/46/png-transparent-jquery-plain-wordmark-logo-icon-thumbnail.png',
                'name' => 'Jquery ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://raw.githubusercontent.com/github/explore/8be26d91eb231fec0b8856359979ac09f27173fd/topics/ajax/ajax.png',
                'name' => 'Ajax ',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://pbs.twimg.com/profile_images/1702781641389920256/n_YDwQgP_400x400.jpg',
                'name' => 'Ngrok',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://assets.vercel.com/image/upload/front/favicon/vercel/152x152.png',
                'name' => 'Vercel app',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://github.githubassets.com/assets/GitHub-Mark-ea2971cee799.png',
                'name' => 'Github',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS36l1Hyc2SOJaUYjNvBEQvN28Pkprjgrh_LFNuzKYY&s',
                'name' => 'Render',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Git-logo.svg/1280px-Git-logo.svg.png',
                'name' => 'Git',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/RecaptchaLogo.svg/768px-RecaptchaLogo.svg.png',
                'name' => 'reCAPTCHA',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://ckeditor.com/blog/Designing-Software-in-the-Open/ckeditor-logo.png',
                'name' => 'CKEditor',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/1280px-Bootstrap_logo.svg.png',
                'name' => 'Bootstrap',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://www.outsystems.com/Forge_CW/_image.aspx/Q8LvY--6WakOw9afDCuuGdNvZ1XqmLcLO9Dr_KewjQI=/quilljs-2023-01-04%2000-00-00-2023-07-17%2005-50-20',
                'name' => 'Quill.js',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/labs/8/8e/Mysql_logo.png',
                'name' => 'Mysql',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://w7.pngwing.com/pngs/956/695/png-transparent-mongodb-original-wordmark-logo-icon-thumbnail.png',
                'name' => 'MongoDB',
                'version' => '10.23.1',
            ],
            [
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEuik0gLgC8c21AfJKWPlpUQ5gAJ2JZGPDHhHUUwABFA&s',
                'name' => 'Xampp',
                'version' => '10.23.1',
            ],
            [
                'logo' => '',
                'name' => 'Quill.js',
                'version' => '10.23.1',
            ],



        ];
        return view('admin.infomation.assignment');
    }
}
