import { createRouter, createWebHistory } from 'vue-router';
import DashboardComponent from './components/DashboardComponent.vue';
import AppliedComponent from './components/AppliedComponent.vue';
import StoreAppliedComponent from './components/StoreAppliedComponent.vue';
import ApplicationDetails from './components/ApplicationDetails.vue';
import UpdateAppliedComponent from './components/UpdateAppliedComponent.vue';

const routes = [
  {
    path: '/',
    component: DashboardComponent,
  },
  {
    path: '/applied',
    component: AppliedComponent,
  },
  {
    path: '/applied/create',
    component: StoreAppliedComponent,
  },
  {
    path: '/applied/edit',
    component: UpdateAppliedComponent,
  },
  {
    path: '/applied/detail',
    component: ApplicationDetails,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;