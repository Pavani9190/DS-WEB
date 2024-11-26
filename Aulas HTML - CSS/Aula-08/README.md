# Pseudoclasses no CSS: Guia Prático e Interativo 💻🎨

Este projeto é uma demonstração prática de como usar pseudoclasses no CSS para criar interações visuais em elementos de uma página. Com exemplos simples, você vai entender como aplicar estilos que respondem a ações do usuário, como `hover`, `focus`, `checked`, entre outros.

---

## O que são Pseudoclasses?

Pseudoclasses são palavras-chave no CSS que permitem aplicar estilos a elementos com base em seu estado ou comportamento. Por exemplo, quando o mouse passa sobre um botão, você pode usar a pseudoclasse `:hover` para mudar sua cor.

---

## Exemplos Incluídos

### 1. **Hover (`:hover`)**
- **Descrição:** Altera o estilo de um botão quando o mouse passa sobre ele.
- **O que acontece?** O botão muda sua cor de fundo para roxo.
- **Exemplo:**  
  ```css
  .button-hover:hover {
      background-color: purple;
  }
  ```

---

### 2. **Active (`:active`)**
- **Descrição:** Aplica um efeito ao botão enquanto ele está sendo clicado.
- **O que acontece?** O botão diminui levemente de tamanho, simulando um "clique".
- **Exemplo:**  
  ```css
  .button-active:active {
      transform: scale(0.95);
  }
  ```

---

### 3. **Focus (`:focus`)**
- **Descrição:** Realça um campo de entrada (input) quando ele está em foco.
- **O que acontece?** O fundo do campo fica roxo e o texto preto.
- **Exemplo:**  
  ```css
  .input-focus:focus {
      color: black;
      background-color: purple;
  }
  ```

---

### 4. **Checked (`:checked`)**
- **Descrição:** Aplica estilos a checkboxes ou botões de rádio marcados.
- **O que acontece?** O elemento aumenta de tamanho quando está selecionado.
- **Exemplo:**  
  ```css
  .radio-checked:checked,
  .checkbox-checked:checked {
      transform: scale(1.5);
  }
  ```

---

### 5. **Links (`:link` e `:visited`)**
- **Descrição:** Estiliza links com base no estado (novo ou já visitado).
- **O que acontece?** Links não visitados são roxos, enquanto os visitados ficam violeta.
- **Exemplo:**  
  ```css
  a:link {
      color: purple;
  }
  a:visited {
      color: violet;
  }
  ```

---

### 6. **Elementos Vazios (`:empty`)**
- **Descrição:** Esconde elementos que não possuem conteúdo.
- **O que acontece?** A `div` sem conteúdo não aparece na tela.
- **Exemplo:**  
  ```css
  div:empty {
      display: none;
  }
  ```

---


## Por que aprender isso?

- **Interatividade:** Melhora a experiência do usuário.
- **Praticidade:** Pseudoclasses permitem criar efeitos sem precisar de JavaScript.
- **Criatividade:** Use esses conceitos para personalizar seus projetos!

---

