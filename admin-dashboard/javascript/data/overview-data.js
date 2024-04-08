import { doctors } from "./doctors-data.js";
import { scheduledPatients } from "./patients-data.js";

export const dataOverview = [
    {
    typeOfCard: 'card-1',
    title: 'Total Doctors',
    count: doctors.length,
    icon: 'ri-user-2-line card--icon--lg',
    }, {
    typeOfCard: 'card-2',
    title: 'Total Nurse',
    count: 56,
    icon: 'ri-user-heart-fill card--icon--lg',
    },
    {
    typeOfCard: 'card-3',
    title: 'Patients',
    count: 102,
    icon: 'ri-user-2-line card--icon--lg',
    },
    {
    typeOfCard: 'card-4',
    title: 'Scheduled',
    count: scheduledPatients.length,
    icon: 'ri-calendar-2-line card--icon--lg'
    },{
    typeOfCard: 'card-5',
    title: 'Staff',
    count: 60,
    icon: 'ri-user-6-line card--icon--lg'
  }];

  