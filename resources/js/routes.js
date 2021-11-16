import AllContact from './components/AllContact.vue';
import ContactForm from './components/ContactForm.vue';
 
export const routes = [
    {
        name: 'contacts',
        path: '/contacts',
        component: AllContact
    },
    {
        name: 'create',
        path: '/',
        component: ContactForm
    }
];