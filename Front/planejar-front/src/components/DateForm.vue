<!-- DateForm.vue -->
<template>
    <div>
      <h2>Horários</h2>
      <form @submit.prevent="submitForm">
        <label for="timestamp">Hora Entrada:</label>
        <input type="datetime-local" v-model="formData.d1" id="d1" required>
  
        <label for="timestamp">Hora Saída:</label>
        <input type="datetime-local" v-model="formData.d2" id="d2" required>
  
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        formData: {
          d1: 'd1',
          d2: 'd1'
        }
      };
    },
    methods: {
      submitForm() {
        console.log(this.formData);
        axios.post('http://localhost:8000/api/hours', this.formData)
        .then(response => {
          console.log('Form submitted successfully:', response.data);
        })
        .catch(error => {
          if (axios.isAxiosError(error)) {
            console.error('AxiosError:', error);
            console.error('Error response:', error.response);
          } else {
            console.error('Non-AxiosError:', error);
          }
        });
      }
    }
  };

  </script>
  
  <style scoped>
  /* Add your component-specific styles here */
  </style>
  