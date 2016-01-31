__author__ = 'ri'

class Matrix:
    def __init__(self, m, n):
        self.m = m
        self.n = n

    def ele(self, a, n):
        l = 0
        for c in range(n):
            for d in range(n):
                l += 1
                a[c][d] = l


    def print_matrix(self, a):
        for c in range(len(a)):
            for d in range(len(a)):
                print(a[c][d], end=',  ')
                # print(c, end='')
                # print(',', end='')
                # print(d, end='')
                # print('  ', end='')
            print()
        print('-------------\n')


    def convert(self):
        m = self.m
        n = self.n
        b = [[0 for i in range(m)] for j in range(n)]
        t = 0
        x = 0
        for i in range(m):
            for j in range(n):
                if (i == x and ((i == 0 and j == 0) or (x <= j < n - x - 1))) or (n % 2 != 0 and i == j and j == (n // 2)):
                    t += 1
                    b[i][j] = t
                if j == n - x - 1:
                    for k in range(x, n - x):
                        if k != n - x - 1:
                            t += 1
                            b[k][j] = t
                        if k == n - x - 1:
                            for l in reversed(range(x + 1, n - x)):
                                t += 1
                                b[k][l] = t
                            for p in reversed(range(x + 1, n - x)):
                                t += 1
                                b[p][n - k - 1] = t
                            x += 1
        self.print_matrix(b)


if __name__ == '__main__':
    print('Enter the number of columns or rows: ', end='')
    n = int(input())
    m = int(input())
    # m = n
    # n = 4
    # m = 6
    matrix = Matrix(m, n)
    matrix.convert()

