#6. (Função sem retorno sem parâmetro) Faça uma função/método que leia um valor inteiro entre 1 e 9 e mostre a seguinte tabela de multiplicação
def matriz():
    import random

    numero_sorteio = random.randint(1, 9)
   
    for linha in range(1, numero_sorteio + 1):
        for coluna in range(1, linha + 1):
            resultado = (linha * coluna)
            print(resultado, end = '\t')
        print()
def main():
    matriz()

main()

    
    
