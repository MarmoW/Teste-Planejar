<!-- DateForm.vue -->
<template>
    <div class="d1">
    <div class="d2">
      <h2>Horários</h2>
      <form @submit.prevent="submitForm">
        <div>
        <label for="timestamp">Hora Entrada:</label>
        <input type="datetime-local" v-model="formData.d1" id="d1" required>
        </div>
        <div>
        <label for="timestamp">Hora Saída:</label>
        <input type="datetime-local" v-model="formData.d2" id="d2" required>
        </div>
        <button type="submit">Submit</button>
      </form>
      <p>{{ resp }}</p  >
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';

  

  export default {
    data() {
      return {
        resp: '',
        formData: {
          d1: 'd1',
          d2: 'd2'
        }
      };
    },
    

    methods: {
      updateResponse(respdata) {
      // Update the variable when the button is clicked
      this.resp = respdata;
  },
      submitForm() {
        axios.post('http://localhost:8000/api/hours', this.formData)
        .then(response => {
          this.responseData = response.data;
          console.log('Form submitted successfully:', response.data);
          this.updateResponse(response.data);
        })
        .catch(error => {
          if (axios.isAxiosError(error)) {
            console.error('Erro no Axios:', error);
            console.error('Informação do Erro:', error.response);
            
          } else {
            console.error('Non-AxiosError:', error);
          }

        });
        
      }
    }
  };

  </script>
  
  <style scoped>
  p {
    font-size: 25px;
    margin-top: 50px;
  }

  input {
    box-sizing: border-box;
    height: 30px;
    width: 200px;
    margin-top: 20px;
    margin-left: 20px;
  }

  label {
    font-size: 20px;
  }

  button {
    margin-top: 40px;
    border-radius: 50px;
    width: 200px;
    height: 50px;
    background-color: #6d43ba;
    color: #FFFFFF;
    border-style: none;
    
  }

  h2{
    color: #6d43ba;
    font-size: 40px;
  }

  .d1 {
    display: flex;
    box-sizing: border-box;
    background-color: #efecf8;
    width: 100%;
    height: 100%;
    position: fixed;
    justify-content: center;
    align-items: center;
    right: 0;
    top: 0;
  }
  .d2 {
    position: relative;
    box-sizing: border-box;
    justify-content: center;
    align-items: center;
    border-radius: 25px;
    background-color: #FFFFFF;
    width: 800px;
    height: 600px;
    padding-top: 20px;
  }
  </style>
  