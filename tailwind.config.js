module.exports = {
  content: ["./application/modules/**/*.{php,html,js}", "./assets/dist/*.{js}"],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'] 
      },
    },
  },
  variants: {
    width: ["responsive", "hover", "focus"]
  },
  plugins: [
    require("daisyui"), 
    require('@tailwindcss/typography'),
    // require('@tailwindcss/forms')({
    //   strategy: 'class', 
    // }),
  ],
  daisyui:{
    themes: false,
  }
}
