let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;

// End Authentication
let home = require('./components/home.vue').default;
// partner router
let createpartner = require('./components/partner/create.vue').default;
let listpartner = require('./components/partner/index.vue').default;
let editpartner = require('./components/partner/edit.vue').default;
// Employee router

let getEmployee = require('./components/employee/index.vue').default;
let createEmployee = require('./components/employee/create.vue').default;
let editEmployee = require('./components/employee/edit.vue').default;


let getCourse = require('./components/course/index.vue').default;
let createCourse = require('./components/course/create.vue').default;
let editCourse = require('./components/course/edit.vue').default;
// student
let getStudent = require('./components/student/index.vue').default;
let createStudent = require('./components/student/create.vue').default;
let editStudent = require('./components/student/edit.vue').default;

// student
let getMarks = require('./components/marks/index.vue').default;
let createMarks = require('./components/marks/create.vue').default;
let editMarks = require('./components/marks/edit.vue').default;

export const routes = [

     // Marks
     {
        path: '/marks-list',
        component: getMarks,
        name: 'marks-list'
    },
    {
        path: '/create-marks',
        component: createMarks,
        name: 'create-marks'
    },
    {
        path: '/edit-marks/:id',
        component: editMarks,
        name: 'edit-marks'
    },





    {
        path: '/course-list',
        component: getCourse,
        name: 'course-list'
    },
    {
        path: '/create-course',
        component: createCourse,
        name: 'create-course'
    },
    {
        path: '/edit-course/:id',
        component: editCourse,
        name: 'edit-course'
    },
    // student
    {
        path: '/student-list',
        component: getStudent,
        name: 'student-list'
    },
    {
        path: '/create-student',
        component: createStudent,
        name: 'create-student'
    },
    {
        path: '/edit-student/:id',
        component: editStudent,
        name: 'edit-student'
    },







    {
        path: '/',
        component: login,
        name: '/'
    },
    {
        path: '/register',
        component: register,
        name: 'register'
    },
    {
        path: '/logout',
        component: logout,
        name: 'logout'
    },
    {
        path: '/home',
        component: home,
        name: 'home'
    },
    // ====== partner ========
    {
        path: '/create-partner',
        component: createpartner,
        name: 'create-partner'
    },
    {
        path: '/list-partner',
        component: listpartner,
        name: 'list-partner'
    },
    {
        path: '/edit-partner/:id',
        component: editpartner,
        name: 'edit-partner'
    },
    // ====== Employee ========
    {
        path: '/employee/list',
        component: getEmployee,
        name: 'employee-list'
    },
    {
        path: '/employee/create',
        component: createEmployee,
        name: 'employee-create'
    },
    {
        path: '/employee/edit/:id',
        component: editEmployee,
        name: 'employee-edit'
    },

]
