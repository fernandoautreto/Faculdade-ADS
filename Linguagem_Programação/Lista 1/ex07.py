#7. (Função sem retorno sem parâmetro) Faça uma função/método que leia três notas de um aluno e uma letra, se a letra for igual a A, deverá calcular a média aritimética das notas dos alunos, se for P, deverá calcular a média ponderada, com pesos 5, 3 e 2. A média deve ser mostrada ao final.

def media():

    nota = []
    soma_nota = 0
    p1 = 5
    p2 = 3 
    p3 = 2

    for i in range(3):
        nota.append(float(input(f'Digite a {i + 1}ª nota: ')))
        soma_nota += nota[i]

    decisao = input('Média Aritimética [A] \nMédia Ponderada [P] \nO que deseja calcular [A/P]: ' ).upper()

    if decisao == 'A' or decisao == 'P':
        if decisao == 'A':
            media_a = soma_nota / len(nota)
            print( f'A média aritiméca do aluno: {media_a:.1f}')
        else:
            media_p = (nota[0] * p1 + nota[1] * p2 + nota[2] * p3) / (p1 + p2 + p3)
            print(f'A média poderado do aluno: {media_p:.1f}')
    else:
        print('Opção invalida.')

def main():
    media()
    
main()