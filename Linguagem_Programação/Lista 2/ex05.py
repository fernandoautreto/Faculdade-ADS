#(Função sem retorno com parâmetro) Faça uma função/método para a partir de um valor inicial e um valor final realizar o acúmulo/somatório desse valores e apresentar o resultado. Não use vetor.
def soma(x, y, resultado):

    print(f'A soma de todos os número entre {y} e {x} é: {resultado}' if x >=y else f'A soma de todos os número entre {x} e {y} é: {resultado}')
    
   
def main():
    a = int(input('Digite um número qualquer: '))
    b = int(input('Digite outro número: '))
    
    if a >= b:
        somatoria = 0
        for i in range(b, a + 1):
            somatoria += i
       
    else:
        somatoria = 0
        for i in range(a, b + 1):
            somatoria += i
       

    soma(a, b, somatoria)

main()