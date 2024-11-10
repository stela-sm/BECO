import tkinter as tk 
 
# Função chamada quando o botão é clicado 
def mostrar_texto(): 
    texto = entrada.get() 
    print("Você digitou:", texto)

 
# Função chamada ao selecionar um botão 
def selecionar_opcao(): 
    print("Opção selecionada:", opcao.get()) 
 
# Cria a janela principal 
janela = tk.Tk() 
 
# Define o título da janela 
janela.title("Minha primeira tela em Tkinter") 
 
# Define o tamanho da janela 
janela.geometry("400x300") 

# Variável que armazena o valor do botão selecionado 
opcao = tk.StringVar() 

# Adiciona um rótulo 
label = tk.Label(janela, text="Digite algo:") 
label.pack() 
 
# Adiciona um campo de entrada de texto 
entrada = tk.Entry(janela) 
entrada.pack() 
 
# Adiciona um botão 
botao = tk.Button(janela, text="Exibir texto", command=mostrar_texto) 
botao.pack()

# Cria os radio buttons 
radio1 = tk.Radiobutton(janela, text="Opção 1", variable=opcao, 
value="1", command=selecionar_opcao) 
radio1.pack() 
 
radio2 = tk.Radiobutton(janela, text="Opção 2", variable=opcao, 
value="2", command=selecionar_opcao) 
radio2.pack() 
 
radio3 = tk.Radiobutton(janela, text="Opção 3", variable=opcao, 
value="3", command=selecionar_opcao) 
radio3.pack() 
 
# Roda a aplicação 
janela.mainloop()

