/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need these lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {},
    },

    daisyui: {
        themes: [
            "light", "dark", "cupcake", "lofi"
            // {
            //     mytheme: {
            //         "primary": "#374151",    // Cinza escuro para ações principais
            //         "secondary": "#6b7280",  // Cinza médio para ações secundárias
            //         "accent": "#f3f4f6",     // Cinza claro para destaques
            //         "neutral": "#111827",    // Fundo neutro muito escuro
            //         "base-100": "#e5e7eb",   // Base clara para o conteúdo
            //         "info": "#60a5fa",       // Azul claro para informações
            //         "success": "#34d399",    // Verde pastel para sucesso
            //         "warning": "#facc15",    // Amarelo forte para avisos
            //         "error": "#f87171",      // Rosa avermelhado para erros
            //     },
            // },
        ],
    },


    // Add daisyUI
    plugins: [require("daisyui")]
}
